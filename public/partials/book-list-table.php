<?php
/**
 * Book Details HTML
 *
 * @link       akashsoni.com
 * @since      1.0.0
 * @package    Library_Book_Search_Plugin
 * @subpackage Library_Book_Search_Plugin/public/partials
 */

$book_data = get_query_var( 'book_search_data', array(
	'max_price' => 0,
	'min_price' => 0,
) );

$publisher_terms = get_terms(
	array(
		'taxonomy' => 'publisher',
	)
);
?>
<div class="search-book-list" id="search-book-list">
	<div class="search-heading">
		<?php echo esc_html( 'Book Search', 'library-book-search-plugin' ); ?>
	</div>
	<div class="lbs-col-md-2">
		<label>
			<?php echo esc_html( 'Book Name: ', 'library-book-search-plugin' ); ?>
		</label>
		<input class="book-name" type="text"/>
	</div>
	<div class="lbs-col-md-2">
		<label><?php echo esc_html( 'Author: ', 'library-book-search-plugin' ); ?></label>
		<input class="book-author" type="text"/>
	</div>
	<div class="lbs-col-md-2">
		<label><?php echo esc_html( 'Publisher: ', 'library-book-search-plugin' ); ?></label>
		<select class="book-publisher">
			<option value=""><?php echo esc_html( 'Select Publisher', 'library-book-search-plugin' ); ?></option>
			<?php
			if ( $publisher_terms ) {
				foreach ( $publisher_terms as $publisher_term ) {
					?>
					<option value="<?php echo esc_attr( $publisher_term->name ); ?>"><?php echo esc_html( $publisher_term->name ); ?></option>';
					<?php
				}
			}
			?>
		</select>
	</div>
	<div class="lbs-col-md-2">
		<label><?php echo esc_html( 'Rating: ', 'library-book-search-plugin' ); ?></label>
		<select class="book-rating">
			<option value=""><?php echo esc_html( 'Select Rating', 'library-book-search-plugin' ); ?></option>
			<?php
			for ( $i = 1; $i < 6; $i ++ ) {
				?>
				<option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></option>';
				<?php
			}
			?>
		</select>
	</div>
	<div class="lbs-col-md-2">
		<label><?php echo esc_html( 'Price: ', 'library-book-search-plugin' ); ?></label>
		<span class="price-range">
			<?php echo esc_html( '$' . $book_data['min_price'] . ' - $' . $book_data['max_price'] ); ?>
		</span>
		<input type="hidden" class="book-price" max="<?php echo esc_attr( $book_data['max_price'] ); ?>"
		min="<?php echo esc_attr( $book_data['min_price'] ); ?>"/>
		<div id="book-price"></div>
	</div>
	<div class="lbs-col-md-1">
		<button class="btn-book-search"><?php echo esc_html( 'Search', 'library-book-search-plugin' ); ?></button>
	</div>
</div>
<div class="book-list-table">
	<table class="book-list" id="book-list">
		<thead>
		<tr>
			<th>
				<?php echo esc_html( 'No', 'library-book-search-plugin' ); ?>
			</th>
			<th>
				<?php echo esc_html( 'Book Name', 'library-book-search-plugin' ); ?>
			</th>
			<th>
				<?php echo esc_html( 'Price', 'library-book-search-plugin' ); ?>
			</th>
			<th>
				<?php echo esc_html( 'Author', 'library-book-search-plugin' ); ?>
			</th>
			<th>
				<?php echo esc_html( 'Publisher', 'library-book-search-plugin' ); ?>
			</th>
			<th>
				<?php echo esc_html( 'Rating', 'library-book-search-plugin' ); ?>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php echo wp_kses_post( $book_lists ); ?>
		</tbody>
	</table>
</div>

