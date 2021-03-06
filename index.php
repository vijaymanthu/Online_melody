<?php
session_start();
include 'files/functions.php';
require_once("files/header.php");
$top_songs = get_top_songs($conn);
?>
<!-- 
[artist_id] => 5
[artist_name] => Jizzle
[artist_biography] => Jizzle was influenced by artist like Lil Wayn
[artist_details] => 
[artist_photo] => 1592902550_15623277316181_IMG_1965.jpeg
[song_id] => 2
[song_mp3] => 1592903501_24985636169454_Jizzle_-_Jealousy_(
[song_photo] => 1592903501_75222169227962_song_pic.png
[song_date] => 1592904725
[aritst_id] => 5
[song_name] => Jealousy 
[view_count] => 4
 -->
<div class="container">
	<ul class="list-group mt-md-3">
		<li class="list-group-item">
			<h2 class="display-4">TOP 10 Hits</h2>
		</li>


		<?php $i = 0;
		foreach ($top_songs as $key => $s) :
			if ($i > 9)
				break;

			$i++;
		?>
			<li class="list-group-item">
				<div class="row">
					<div class="col">
						<img class="img-fluid rounded" width="100" src="uploads/<?php echo $s['song_photo']; ?>" alt="">
					</div>
					<div class="col">
						<div class="row">
							<div class="col-12">
								<?php echo $s['song_name']; ?>
							</div>
							<div class="col-12">
								<?php echo $s['artist_name']; ?>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="col">
							<div class="row">
								<div class="col-12">
									<?php echo $s['download_count']; ?> Downloads
								</div>
								<div class="col-12">
									<?php echo $s['view_count']; ?> Views
								</div>
								<div class="col-12">
									<?php echo get_likes($conn, $s['song_id']); ?> <i href="#" id="liked" class="fa fa-thumbs-up"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col text-center">
						<a href="play.php?song=<?php echo ($s['song_id']); ?>" title=""><img width="100" src="img/play.png" alt=""></a>
					</div>
				</div>
			</li>


		<?php endforeach ?>

	</ul>



	<!-- Artists -->
	<ul class="list-group  mt-5 mb-5">
		<li class="list-group-item">
			<h2 class="display-4">India Top Artists</h2>
		</li>
		<li class="list-group-item">


			<!--  all artists songs -->
			<div class="row">

				<?php
				$all_artists = get_all_artists($conn);
				$i = 0;
				foreach ($all_artists as $key => $a) :
					if ($i > 5)
						break;
					$i++; ?>
					<div class="col-6 col-md-2 rounded ">
						<a href="artist.php?artist_id=<?= $a['artist_id'] ?>" title="<?= $a['artist_name'] ?>"><img class="img-fluid rounded-circle" src="uploads/<?php echo $a['artist_photo']; ?>" alt=""></a>
					</div>

				<?php endforeach ?>
			</div>

		</li>

	</ul>






	<!-- Latest songs -->

</div>


<?php require_once("files/footer.php"); ?>