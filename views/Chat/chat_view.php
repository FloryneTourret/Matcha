<?php if (count($discutions) > 0) : ?>
	<div class="row" style="height: calc(100vh - 60px)">
		<div id="sidebar" class="col-md-3 col-sm-3 hidden-xs border-right">
			<h2 class="mt-3 pl-2">Contacts</h1>
				<hr />
				<?php foreach ($discutions as $discution) : ?>
					<?php $user = $discution['u1_login'] == $_SESSION['user']['login'] ? "u2" : "u1"; ?>
					​<div id="<?= $discution['discution_id'] ?>" class="media contact w-100 hidden-xs">
						<img src="/<?= $discution['path_profile_picture']; ?>" class="align-self-center mr-3 rounded-circle" style="width:64px" alt="...">
						<div class="media-body">
							<h5 class="mt-0 text-break">Username</h5>
							<p class="text-break">Dernier message...</p>
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
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.dev.js"></script>
<script>
	const socket = io.connect('https://localhost:5000/');
	const input = document.getElementById("message-input");
	const userid = <?php echo $_SESSION['user']['user_id']; ?>;
	const room = document.getElementById('room');
	const contactsArray = document.getElementsByClassName('contact');

	for (var i = 0; i < contactsArray.length; i++) {
		contactsArray[i].addEventListener("click", (e) => {
			console.log(e.target.parentNode);
		});
	};

	socket.on('message', (data) => {
		room.innerHTML += htmlMessageReceived(data);
	})

	if (input != null) {
		input.addEventListener('keyup', (e) => {
			if (e.keyCode == 13) {
				socket.emit('message', {
					userId: userid,
					content: input.value,
					picture: "<?php echo $_SESSION['user']['path_profile_picture']; ?>"
				});
				room.innerHTML += htmlMessage({
					content: input.value
				});
			}
		})
	}

	function htmlMessage(data) {
		return `<div class="media">
  <div class="media-body text-right">
    <p class="text-break text-white message-text align-middle">${data.content}</p>
  </div>
  <img src="/<?php echo $_SESSION['user']['path_profile_picture']; ?>" class="align-self-center ml-3 rounded-circle" style="width:64px" alt="...">
</div>`;
	}

	function htmlMessageReceived(data) {
		return `<div class="media">
		<img src="/${data.picture}" class="align-self-center mr-3 rounded-circle" style="width:64px" alt="...">
  <div class="media-body text-left">
    <p class="text-break text-white message-received align-middle">${data.content}</p>
  </div>
</div>`;
	}
</script>