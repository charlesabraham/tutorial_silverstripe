<body>







<div class="container">

<h1> $Title </h1>

<div class=”breadcrumb” />  $Breadcrumbs </div>


<% if $Menu(2) %>
  <h3>In this section</h3>
    <ul class="subnav">  
      <% loop $Menu(2) %>
        <li><a class="$LinkingMode" href="$Link">$MenuTitle</a></li>
      <% end_loop %>
    </ul>
<% end_if %>





<div class="main col-sm-12" />  $Content </div>

<div class="forms"> $Form </div>
</div> <!--container-->
  </body>
