<?php
$brendanf = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/brendanf.JPG" class="img-responsive img-circle rotate90" alt="" height="255px" width="255px">
						<h4>Brendan F.</h4>
						<p class="text-muted"></p>
					</div></div>';
$brendanl = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/brendanl.JPG" class="img-responsive img-circle" alt="" height="255px" width="255px">
						<h4>Brendan L.</h4>
						<p class="text-muted"></p>
					</div></div>';
$brian = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/brian.JPG" class="img-responsive img-circle rotate90" alt="" height="255px" width="255px">
						<h4>Brian C.</h4>
						<p class="text-muted"></p>
					</div></div>';
$cayden = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/cayden.JPG?u=1" class="img-responsive img-circle rotate90" alt="" height="255px" width="255px">
						<h4>Cayden G.</h4>
						<p class="text-muted"></p>
					</div></div>';
$cheyenne = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/cheyenne.JPG?u=1" class="img-responsive img-circle rotate90" alt="" height="255px" width="255px">
						<h4>Cheyenne W.</h4>
						<p class="text-muted"></p>
					</div></div>';
$joe = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/joe.JPG" class="img-responsive img-circle rotate90" alt="" height="255px" width="255px">
						<h4>Joe M.</h4>
						<p class="text-muted"></p>
					</div></div>';
$kyler = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/kylier.JPG?u=1" class="img-responsive img-circle rotate90" alt="" height="255px" width="255px">
						<h4>Kyler S.</h4>
						<p class="text-muted"></p>
					</div></div>';
$logan = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/logan.JPG" class="img-responsive img-circle" alt="" height="255px" width="255px">
						<h4>Logan F.</h4>
						<p class="text-muted"></p>
					</div></div>';
$raymond = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/raymond.JPG" class="img-responsive img-circle" alt="" height="255px" width="255px">
						<h4>Raymond N.</h4>
						<p class="text-muted"></p>
					</div></div>';
$zach = '<div class="col-sm-4">
					<div class="team-member">
						<img src="../img/team/zach.JPG" class="img-responsive img-circle" alt="" height="255px" width="255px">
						<h4>Zach W.</h4>
						<p class="text-muted"></p>
					</div></div>';

$users = Array($brendanl, $brendanf, $zach, $raymond, $logan, $joe, $kyler, $cheyenne, $brian);
shuffle($users);
print $users[0];
print $users[1];
print $users[2];


?>