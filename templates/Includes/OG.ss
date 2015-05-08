<meta name="twitter:card" content="summary" />
<% if $getOG(OGTitle) %><meta property="og:title" content="$getOG(Title)" />
<meta name="twitter:title" content="$getOG(OGTitle)" /><% end_if %>
<% if $getOG(OGDescription) %><meta property="og:description" content="$getOG(OGDescription)" />
<meta name="twitter:description" content="$getOG(OGDescription)" /><% end_if %>
<% if $getOG(OGImage) %><meta property="og:image" content="$getOG(OGImage).CroppedImage(200,200).AbsoluteURL" />
<meta name="twitter:image" content="$getOG(OGImage).CroppedImage(200,200).AbsoluteURL" /><% end_if %>
<% if $TwitterName %><meta property="twitter:site" content="@{$TwitterName}" /><% end_if %>
<meta property="og:url" content="$CurrentPageURL" />
<meta name="twitter:url" content="$CurrentPageURL" />