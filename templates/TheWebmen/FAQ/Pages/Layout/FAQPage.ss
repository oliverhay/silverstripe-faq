<h1>$Title</h1>
<% loop $Categories %>
    <h2>$Title</h2>
    <ul>
        <% loop $Questions %>
            <li>
                <h3>$Question</h3>
                <div>
                    $Answer
                </div>
            </li>
        <% end_loop %>
    </ul>
<% end_loop %>
