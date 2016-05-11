<body>

<div class="container">

<h1> $Title </h1>

<div class=”breadcrumb” />  $Breadcrumbs </div>

<div class="main col-sm-3" />

<% if $Menu(2) %>
  <h3>In this section</h3>
    <ul class="subnav">  
      <% loop $Menu(2) %>
        <li><a class="$LinkingMode" href="$Link">$MenuTitle</a></li>
      <% end_loop %>
    </ul>
<% end_if %>


<div class="image">$Photo.SetWidth(400)</div>

</div>
<div class="main col-sm-9" />  $Content 

<% if $Brochure %>
      <div class="row">
        <div class="col-sm-12"><a class="btn btn-warning btn-block" href="$Brochure.URL"> Download brochure ($Brochure.Extension, $Brochure.Size)</a>
        </div>
      </div>
    <% end_if %>

<li><i class="fa fa-tags"></i> 
     <% loop $Categories %>$Title<% if not $Last %>, <% end_if %><% end_loop %>
</li>

<div class="forms"> $Form </div>

<div class="comments">
    <ul>
        <% loop $Comments %>                        
        <li>
            <img src="$AbsoluteBaseURL/$ThemeDir/images/comment-man.jpg" alt="" />
            <div class="comment">                                
                <h3>$Name<small>$Created.Format('j F, Y')</small></h3>
                <p>$Comment</p>
            </div>
        </li>
        <% end_loop %>
    </ul>
</div>
$CommentForm
</div>

</div>
  </body>
