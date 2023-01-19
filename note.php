<div class="col" id=<?php echo $note_list[$i]["id"] ?>>
	<div class="card">
		<svg class="bd-placeholder-img card-img-top" width="100%" height="125"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $note_list[$i]["name"] ?></text></svg>
		<div class="card-body">
			<p class="card-text"><?php echo $note_list[$i]["description"] ?></p>
			<p class="card-text">
				<?php
					$new_rec = str_replace("\n", "<br>", $note_list[$i]["recipe"]);
					echo $new_rec;
				?>
			</p>
			<div class="d-flex justify-content-between align-items-center">
				<div class="btn-group">
					<!--<button type="button" class="btn btn-sm btn-outline-secondary">Просмотр</button>-->
					<button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
				</div>
				<!--<small class="text-muted">Количество просмотров</small>-->
			</div>
		</div>
	</div>
</div>	
