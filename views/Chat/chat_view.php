<?php if (count($discussions) > 0) : ?>
	<div class="row" style="height: calc(100vh - 60px)">
		<div id="sidebar" class="col-md-3 col-sm-3 hidden-xs border-right">
			<h2 class="mt-3 pl-2">Contacts</h1>
				<hr />
				<?php foreach ($discussions as $discussion) : ?>
					​<div id="<?= $discussion['discussion_id'] ?>" class="media contact w-100 hidden-xs" onclick="selectDiscussion(this.id)">
						<?php $picture = $discussion['u1_login'] == $_SESSION['user']['login'] ? $discussion['u2_picture'] : $discussion['u1_picture'];
						if (empty($picture))
							$picture = "assets/img/avatar.png"; ?>
						<img src="/<?= $picture ?>" class="align-self-center mr-3 rounded-circle" style="width:64px" alt="...">
						<div class="media-body">
							<h5 id="user-<?php echo $discussion['first_user_id'] == $_SESSION['user']['user_id'] ?  $discussion['second_user_id'] : $discussion['first_user_id']?>" class="mt-0 text-break"><?= $discussion['u1_login'] == $_SESSION['user']['login'] ? $discussion['u2_login'] : $discussion['u1_login'] ?></h5>
							<p class="text-break"><?= $discussion['lu'] === 0  && $discussion['last_message_user'] != $_SESSION['user']['user_id'] ? "<span id='dot-" . $discussion['discussion_id'] ."' class='dot'></span>" : ""?><?= $discussion['last_message']; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
		</div>

		<div id="discussion" class="col-md-9 col-sm-9 col-xs-12">
			<div id="room" style="height:95vh; overflow-y: auto;">
			</div>
			<div class="input-group position-absolute" style="bottom:5px">
				<input id="message-input" type="text" class="form-control" placeholder="Saisissez votre message" aria-label="Saisissez votre message..." aria-describedby="button-addon2">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-paper-plane"></i></button>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="w-100 text-center">
		<img src="https://barkpost-assets.s3.amazonaws.com/wp-content/uploads/2013/11/3dDoge.gif">
		<h1 class="text-center mt-5">Wow! Such empty</h1>
	</div>
<?php endif; ?>

<style>
	@media screen (max-width: 650px) {
		#sidebar {
			display: none;
		}
	}

	body {
		padding: 0;
	}

	#sidebar {
		padding-right: 0;
	}

	.contact {
		padding: 10px;
	}

	.contact:hover {
		background-color: #ECEEF9;
	}

	#room {
		padding: 20px;
	}

	.media-body {
		padding:
	}

	.message-text {
		margin-top: 16px;
		display: inline-block;
		max-width: 75%;
		padding: 10px;
		border-radius: 10px;
		background-color: #EF6461;
	}

	.message-received {
		margin-top: 16px;
		background-color: #5D576B;
		display: inline-block;
		max-width: 75%;
		padding: 10px;
		border-radius: 10px;
	}

	.active {
		background-color: rgb(238, 101, 97, 0.3);
	}

	.unread {
		background-color: gb(238, 101, 97, 0.1);
	}

	.dot {
		height: 15px;
		width: 15px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		margin-right: 15px;
	}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.dev.js"></script>
<script>
	const socket = io.connect('https://localhost:5000/');
	const input = document.getElementById("message-input");
	const userid = <?php echo $_SESSION['user']['user_id']; ?>;
	const room = document.getElementById('room');
	const contactsArray = document.getElementsByClassName('contact');
	let currentDiscussion = document.getElementsByClassName('contact')[0];
	let dest = 0;

	socket.emit('join', {roomId: <?php echo $_SESSION['user']['user_id']; ?>});

	socket.on('message-received', (data) => {
		if (data.discussion_id == currentDiscussion.id) {
			room.innerHTML += htmlMessageReceived(data);
		}
		var discussion =  document.getElementById(data.discussion_id);
		var lastMsg = discussion.childNodes[3].childNodes[3];
		discussion.classList.add("unread");
		lastMsg.innerText = data.message_content.substr(0, 15);
		room.lastChild.scrollIntoView();
	})
	if($(".contact")[0] != undefined){
		$(".contact")[0].classList.add('active');
		selectDiscussion(currentDiscussion.id);
	}

	if (input != null) {
		input.addEventListener('keyup', (e) => {
			if (e.keyCode == 13) {
				if (input.value.length > 0) {
					$.post('/index.php/chat/post_message', {
						discussion_id: currentDiscussion.id,
						message_content: input.value
					});
					socket.emit('message', {
						roomId: dest,
						discussionId: currentDiscussion.id,
						userId: userid,
						content: input.value,
						picture: "<?php echo $_SESSION['user']['path_profile_picture']; ?>"
					});
					room.innerHTML += htmlMessage({
						message_content: input.value
					});
					document.getElementById(currentDiscussion.id).childNodes[3].childNodes[3].innerHTML = input.value.substr(0, 15);
					input.value = '';
					room.lastChild.scrollIntoView();
				}
			}
		})
	}

	function selectDiscussion(id) {
		currentDiscussion = document.getElementById(id);
		dest = document.getElementById(currentDiscussion.id).childNodes[3].childNodes[1].id.substr(5);
		document.getElementsByClassName('active')[0].classList.remove('active');
		currentDiscussion.classList.add('active');
		var oldMessages = $("#room").children();
		if (oldMessages.length > 0)
			oldMessages.remove();
		$.get('/index.php/chat/get_discussion_messages', {
			discussion_id: id
		}, (data) => {
			obj = JSON.parse(data);
			for (i = 0; i < obj.length; i++) {
				if (obj[i].user_id == <?php echo $_SESSION['user']['user_id']; ?>) {
					room.innerHTML += htmlMessage({
						message_content: obj[i].message_content,
						path_profile_picture: obj[i].path_profile_picture
					});

					room.lastChild.scrollIntoView();
				} else {
					room.innerHTML += htmlMessageReceived({
						message_content: obj[i].message_content,
						path_profile_picture: obj[i].path_profile_picture
					});
					room.lastChild.scrollIntoView();
				}
			}
		});
		$.post('/index.php/chat/read_all', {discussion_id: currentDiscussion.id}, (data) => {
		});
	}

	function htmlMessage(data) {
		return `<div class="media">
  <div class="media-body text-right">
    <p class="text-break text-white message-text align-middle">${data.message_content}</p>
  </div>
  <img src="/<?php echo $_SESSION['user']['path_profile_picture'] ? $_SESSION['user']['path_profile_picture'] : "assets/img/avatar.png" ?>" class="align-self-center ml-3 rounded-circle" style="width:64px" alt="...">
</div>`;
	}

	function htmlMessageReceived(data) {
		var picture = data.path_profile != null ? data.path_profile : "assets/img/avatar.png";
		var msg = `<div class="media">
		<img src="/${picture}" class="align-self-center mr-3 rounded-circle" style="width:64px" alt="...">
  <div class="media-body text-left">
    <p class="text-break text-white message-received align-middle">${data.message_content}</p>
  </div>
</div>`;
		return msg;
	}
</script>