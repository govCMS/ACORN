<a href="<?php print $content['field_image_link'][0]['#element']['url'] ?>">
	<img src="<?php print file_create_url($content['field_image'][0]['#item']['uri']); ?>" alt="<?php print $content['field_image'][0]['#item']['alt']; ?>" />
	<span class="text"><?php print $content['field_image_text'][0]['#markup'] ?></span>
	<span class="title"><?php print $content['field_image_title'][0]['#markup'] ?></span>
</a>