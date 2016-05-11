<ul class="social-networks">
  <% with $SiteConfig %>
    <% if $FacebookLink %>
      <li><a href="$FacebookLink"><i class="fa fa-facebook"></i></a></li>
    <% end_if %>
    <% if $TwitterLink %>
      <li><a href="$TwitterLink"><i class="fa fa-twitter"></i></a></li>
    <% end_if %>
    <% if $GoogleLink %>
      <li><a href="$GoogleLink"><i class="fa fa-google"></i></a></li>
    <% end_if %>
    <% if $YouTubeLink %>
      <li><a href="#"><i class="fa fa-youtube"></i></a></li>    
    <% end_if %>
  <% end_with %>                                
</ul>
