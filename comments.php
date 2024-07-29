<?php if( comments_open() ){ ?>
	<div id="comments">
		<p class="com-p">comments</p>
		<?php if( have_comments() ){ ?>
		<ol id="comments-list">
			<?php wp_list_comments(); ?>
		</ol>
		<?php } ?>
		<?php comment_form(); ?>
	</div>
<?php } ?>