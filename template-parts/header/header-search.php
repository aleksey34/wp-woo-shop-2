<div class="search">
	<input class="search_box" type="checkbox" id="search_box">
	<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
	<div class="search_form">
		<form action="<?php  home_url('/');  ?>" method="post">
            <div class="search-clear-btn search-clear-btn_hidden">ищем...</div>
			<input  autocomplete="off" value="<?php echo get_search_query()  ?>"
			        type="text" name="s" placeholder="Search...">
			<input type="submit" value="Send">
		</form>
	</div>
</div>