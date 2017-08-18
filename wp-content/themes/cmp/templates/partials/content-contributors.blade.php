@php
  $posts = get_posts(array(
  	'posts_per_page'	=> -1,
  	'post_type'			=> 'post'
    'meta_key'		=> 'author',
  ));
  if( $posts ):
@endphp

<ul>

@php
  foreach( $posts as $post ):
	setup_postdata( $post );
@endphp

		<li>
			<a href="{{the_permalink(); }}">{{ the_title(); }}</a>
		</li>

@php(endforeach;)

</ul>

@php
  pwp_reset_postdata();
  endif;
@endphp
