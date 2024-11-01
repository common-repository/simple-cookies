<div class="wrap sc sc__docs">
    <h1 class="sc__menu-heading">Simple Cookies Documentation</h1>
    <p>Simple Cookies plugin allow to use 4 types of WordPress shortcodes with set of parameters in order to implement
        the dynamic content functionality and not only that.</p>
    <h2 class="cs-subheading">Shortcodes:</h2>
    <ul class="nav nav-tabs sc-tabs">
        <li class="active sc-tabs__item"><a href="#tab-1">addsimplecookie</a></li>
        <li class="sc-tabs__item"><a href="#tab-2">showforsimplecookie</a></li>
        <li class="sc-tabs__item"><a href="#tab-3">hideforsimplecookie</a></li>
        <li class="sc-tabs__item"><a href="#tab-4">removesimplecookie</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <p><code>[addsimplecookie parameter="" value="" time=""]</code> — adds cookie.</p>
            <h3>Examples:</h3>
            <ol>
                <li>
                    <code>[addsimplecookie parameter="<b>cookie1</b>" value="<b>any</b>" time="<b>1 y</b>"]</code> —
                    adds cookie with <code>simplecookie_cookie1</code> name and <code>1 year</code> lifetime if URL of
                    the visited page contains parameter <code>cookie1</code>. Cookie content will be equal to URL
                    parameter’s value, since <code>any</code> is a reserved word for the <code>value</code> parameter.
                </li>
                <li>
                    <code>[addsimplecookie parameter="<b>cookie1</b>" value="<b>test</b>" time="<b>1 d</b>"]</code> —
                    adds cookie with <code>simplecookie_cookie1</code> name and <code>1 day</code> lifetime. Cookie
                    content will be <code>test</code>.
                </li>

                <p><code>time</code> parameter supports the following syntaxis as values:</p>
                <ul>
                    <li><b>X min</b> — X minutes;</li>
                    <li><b>X h</b> — X hours;</li>
                    <li><b>X d</b> — X days;</li>
                    <li><b>X w</b> — X weeks;</li>
                    <li><b>X m</b> — X months;</li>
                    <li><b>X y</b> — X years.</li>
                </ul>
            </ol>
        </div>

        <div id="tab-2" class="tab-pane">
            <p><code>[showforsimplecookie parameter="" value=""]</code> <span class="color-grey">Content</span> <code>[/showforsimplecookie]</code>
                — shows content if user has the cookie.</p>
            <h3>Examples:</h3>
            <ol>
                <li>
                    <code>[showforsimplecookie parameter="<b>cookie1</b>"]</code> <span
                            class="color-grey">Content</span> <code>[/showforsimplecookie]</code> — shows content if
                    user has the cookie with name <code>simplecookie_cookie1</code> or URL of the visited page contains
                    parameter with name <code>cookie1</code>.
                </li>
                <li>
                    <code>[showforsimplecookie parameter="<b>cookie1</b>" value="<b>product</b>"]</code> <span
                            class="color-grey">Content</span> <code>[/showforsimplecookie]</code> — shows content if
                    user has the cookie with name <code>simplecookie_cookie1</code> and content equal to
                    <code>product</code> or URL of the visited page contains parameter with name <code>cookie1</code>
                    and value equal to <code>product</code>.
                </li>
            </ol>
        </div>

        <div id="tab-3" class="tab-pane">
            <p><code>[hideforsimplecookie parameter="" value=""]</code> <span class="color-grey">Content</span> <code>[/hideforsimplecookie]</code>
                — hides content if user has the cookie.</p>
            <h3>Examples:</h3>
            <ol>
                <li>
                    <code>[hideforsimplecookie parameter="<b>cookie1</b>"]</code> <span
                            class="color-grey">Content</span> <code>[/hideforsimplecookie]</code> — hides content if
                    user has the cookie with name <code>simplecookie_cookie1</code> or URL of the visited page contains
                    parameter with name <code>cookie1</code>.
                </li>
                <li>
                    <code>[hideforsimplecookie parameter="<b>cookie1</b>" value="<b>product</b>"]</code> <span
                            class="color-grey">Content</span> <code>[/hideforsimplecookie]</code> — hides content if
                    user has the cookie with name <code>simplecookie_cookie1</code> and content equal to
                    <code>product</code> or URL of the visited page contains parameter with name <code>cookie1</code>
                    and value equal to <code>product</code>.
                </li>
            </ol>
        </div>

        <div id="tab-4" class="tab-pane">
            <p><code>[removesimplecookie parameter="" value=""]</code> — removes cookie.</p>
            <h3>Examples:</h3>
            <ol>
                <li>
                    <code>[removesimplecookie parameter="<b>cookie1</b>"]</code> — removes cookie with name <code>simplecookie_cookie1</code>
                    and any content.
                </li>
                <li>
                    <code>[removesimplecookie parameter="<b>cookie1</b>" value="<b>product</b>"]</code> — removes cookie
                    with name <code>simplecookie_cookie1</code> and content equal to <code>product</code>.
                </li>
            </ol>
        </div>
    </div>

</div>