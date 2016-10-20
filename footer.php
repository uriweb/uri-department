<?php wp_reset_query(); ?>


</div><!-- /grids -->


</div><!-- end mainpage -->

<div class="wmtop" style="margin-top:15px;"><p>Copyright &copy; <?php print(Date("Y")); ?> University of Rhode Island.</p></div>

</div><!-- end wrap class -->
</div><!-- end overall wrapper class for grids -->


<div id="printtag"><img src="<?php echo get_template_directory_uri(); ?>/images/wmhtop.png" alt="The University of Rhode Island" /></div>


<div id="footer">


<div class="wrapper reflection">

<div class="grids">



<?php if (is_home()) { ?><div class="fh"><?php } ?>



    <div class="grid-13 right">



    <p style="margin-bottom:10px;"> <a href="http://www.uri.edu/home/services/">A-Z</a> &ndash; <a href="http://www.uri.edu/home/dir/">Directory</a> &ndash; <a href="http://www.uri.edu/home/dir/contact.html">Contact Us</a> &ndash; <a href="http://www.uri.edu/news/alert/">Alerts</a> &ndash; <a href="#top">Jump to top<img src="<?php echo get_template_directory_uri(); ?>/images/top.png" alt="Jump to top" /></a></p>



      <p>University of Rhode Island, Kingston, RI 02881, USA 1.401.874.1000</p>
      <p>URI is an equal opportunity employer committed to the principles of affirmative action.</p>



    </div>



</div><!-- /end grids -->

</div><!-- /end wrapper -->



</div><!-- /end footer -->


<div class="mobilewordmark"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobilewatermark.png" alt="Think Big, We Do." /></div>

<div class="mobilefooter"><a href="http://www.uri.edu/home/services/">A-Z</a> &ndash; <a href="http://www.uri.edu/home/dir/">Directory</a> &ndash; <a href="http://www.uri.edu/home/dir/contact.html">Contact Us</a> &ndash; <a href="#top">Jump to top</a></div>


<?php wp_footer(); ?>


</body>

</html>