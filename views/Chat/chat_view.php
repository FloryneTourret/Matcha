<?php if (count($discussions) > 0) : ?>
	<div class="row" style="height: calc(100vh - 60px)">
		<div id="sidebar" class="col-md-3 col-sm-3 hidden-xs border-right">
			<h2 class="mt-3 pl-2">Contacts</h1>
				<hr />
				<?php foreach ($discussions as $discussion) : ?>
					​<div id="<?= $discussion['discussion_id'] ?>" class="media contact w-100 hidden-xs" onclick="selectDiscussion(this.id)">
						<img src="/<?= $discussion['u1_login'] == $_SESSION['user']['login'] ? $discussion['u2_picture'] : $discussion['u1_picture'] ?>" class="align-self-center mr-3 rounded-circle" style="width:64px" alt="...">
						<div class="media-body">
							<h5 class="mt-0 text-break"><?= $discussion['u1_login'] == $_SESSION['user']['login'] ? $discussion['u2_login'] : $discussion['u1_login'] ?></h5>
							<p id="<?= $discussion['discussion_id'] ?>-last" class="text-break">Dernier message...</p>
						</div>
					</div>
				<?php endforeach; ?>
		</div>

		<div id="discussion" class="col-md-9 col-sm-9 col-xs-12">
			<div id="room" style="height:95vh">
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
		background-color: #ECEEF9;
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

	socket.on('message', (data) => {
		room.innerHTML += htmlMessageReceived(data);
	})

	$(".contact")[0].classList.add('active');
	selectDiscussion(currentDiscussion.id);

	if (input != null) {
		input.addEventListener('keyup', (e) => {
			if (e.keyCode == 13) {
				$.post('/index.php/chat/post_message', {
					discussion_id: currentDiscussion.id,
					message_content: input.value
				}, (res) => {
					console.log(res);
				});
				socket.emit('message', {
					discussionId: currentDiscussion.id,
					userId: userid,
					content: input.value,
					picture: "<?php echo $_SESSION['user']['path_profile_picture']; ?>"
				});
				room.innerHTML += htmlMessage({
					message_content: input.value
				});
				input.value = '';
			}
		})
	}

	function selectDiscussion(id) {
		currentDiscussion = document.getElementById(id);
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
				} else {
					room.innerHTML += htmlMessageReceived({
						message_content: obj[i].message_content,
						path_profile_picture: obj[i].path_profile_picture
					});
				}

			}

		})

	}

	function htmlMessage(data) {
		return `<div class="media">
  <div class="media-body text-right">
    <p class="text-break text-white message-text align-middle">${data.message_content}</p>
  </div>
  <img src="/<?php echo $_SESSION['user']['path_profile_picture']; ?>" class="align-self-center ml-3 rounded-circle" style="width:64px" alt="...">
</div>`;
	}

	function htmlMessageReceived(data) {
		return `<div class="media">
		<img src="/${data.path_profile_picture}" class="align-self-center mr-3 rounded-circle" style="width:64px" alt="...">
  <div class="media-body text-left">
    <p class="text-break text-white message-received align-middle">${data.message_content}</p>
  </div>
</div>`;
	}
</script>