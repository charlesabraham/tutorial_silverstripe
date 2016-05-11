<body>

<a href="$AbsoluteBaseURL">HOME</a>

<h1> $Title </h1>

<div class=”breadcrumb” />  $Breadcrumbs </div>


<% base_tag %>
<% loop $Menu(1) %>
  <li><a class="$LinkingMode" href="$Link" title="Go to the $Title page">$MenuTitle</a></li>
<% end_loop %>

<% if $Menu(2) %>
  <h3>In this section</h3>
    <ul class="subnav">  
      <% loop $Menu(2) %>
        <li><a class="$LinkingMode" href="$Link">$MenuTitle</a></li>
      <% end_loop %>
    </ul>
<% end_if %>




<div class="main col-sm-9" />  $Content </div>

<div class="forms"> $Form </div>
  </body>
