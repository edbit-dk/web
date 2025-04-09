<h2 class="heading">Username: <?php echo Input::encode($data->user->data()->$Username); ?></h2>
<p>Full name: <?php echo Input::encode($data->user->data()->$Firstname); ?>  <?php echo Input::encode($data->user->data()->$Lastname); ?></p>
<p>Email: <?php echo Input::encode($data->user->data()->$Email); ?> </p>
<p>Phone: <?php echo Input::encode($data->user->data()->$Phone); ?> </p>
<p>Address: <?php echo Input::encode($data->user->data()->$Address); ?> </p>
<p>Zipcode: <?php echo Input::encode($data->user->data()->$Zipcode); ?> </p>
