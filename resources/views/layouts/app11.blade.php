<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<meta charset="utf-8">
    <title>{{ config('app.name', 'Weuping') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Weuping 提供了一个知识在线共享的平台，同时记录和保存自己已有的知识">
    <meta name="keywords" content="Weuping,传道授业解惑">
    <meta name="author" content="Weuping">
    <meta name="robots" content="index,follow">
    <meta name="application-name" content="weuping.com">
    
    <!-- Site CSS -->
    <link href="{{ asset('css/toolkit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon1.png') }}">
    <!-- Scripts -->
    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
  </head>

<body class="bpi">
    <div class="bpv" id="app-growl"></div>
    <nav class="ck rj aeq ro vq app-navbar">
      <button class="re rh ayd" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="rf"></span>
      </button>

      <a class="e" href="index.html">
        <img src="https://bootstrap-themes.github.io/application/assets/img/brand-white.png" alt="brand">
      </a>

      <div class="collapse f" id="navbarResponsive">
        <ul class="navbar-nav ain">
          <li class="qx active">
            <a class="qv" href="index.html">Home <span class="aet">(current)</span></a>
          </li>
          <li class="qx">
            <a class="qv" href="profile/index.html">Profile</a>
          </li>
          <li class="qx">
            <a class="qv" data-toggle="modal" href="#msgModal">Messages</a>
          </li>
          <li class="qx">
            <a class="qv" href="docs/index.html">Docs</a>
          </li>

          <li class="qx ayd">
            <a class="qv" href="notifications/index.html">Notifications</a>
          </li>
          <li class="qx ayd">
            <a class="qv" data-action="growl">Growl</a>
          </li>
          <li class="qx ayd">
            <a class="qv" href="login/index.html">Logout</a>
          </li>

        </ul>

        <form class="pf aec ayc">
          <input class="form-control" type="text" data-action="grow" placeholder="Search" style="width: 180px;">
        </form>

        <ul id="#js-popoverContent" class="nav navbar-nav aec afh ayc">
          <li class="qx">
            <a class="g qv" href="notifications/index.html">
              <span class="h bbf"></span>
            </a>
          </li>
          <li class="qx afx">
            <button class="cg bqv bqw bpq" data-toggle="popover" data-original-title="" title="">
              <img class="wg" src="assets/img/avatar-dhg.png">
            </button>
          </li>
        </ul>

        <ul class="nav navbar-nav hidden-xs-up" id="js-popoverContent">
          <li class="qx"><a class="qv" href="#" data-action="growl">Growl</a></li>
          <li class="qx"><a class="qv" href="login/index.html">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="cd fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="bqx" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <h5 class="modal-title">Messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body agv js-modalBody">
        <div class="azd">
          <div class="bqe cj ca js-msgGroup">
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                <div class="tv">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="bqo">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam …
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-mdo.png">
                <div class="tv">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="bqo">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-dhg.png">
                <div class="tv">
                  <strong>Dave Gamache</strong>
                  <div class="bqo">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                <div class="tv">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="bqo">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam …
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-mdo.png">
                <div class="tv">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="bqo">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-dhg.png">
                <div class="tv">
                  <strong>Dave Gamache</strong>
                  <div class="bqo">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                <div class="tv">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="bqo">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam …
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-mdo.png">
                <div class="tv">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="bqo">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b tw">
              <div class="tu">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-dhg.png">
                <div class="tv">
                  <strong>Dave Gamache</strong>
                  <div class="bqo">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="hidden-xs-up aga js-conversation">
            <ul class="bqe bqk">
              <li class="tu bqn agk">
                <div class="tv">
                  <div class="bql">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="bqm">
                    <small class="axr">
                      <a href="#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <img class="wg bqa wp yy agc" src="assets/img/avatar-dhg.png">
              </li>

              <li class="tu agk">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                <div class="tv">
                  <div class="bql">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="bql">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="bql">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="bqm">
                    <small class="axr">
                      <a href="#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="tu agk">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-mdo.png">
                <div class="tv">
                  <div class="bql">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="bql">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="bqm">
                    <small class="axr">
                      <a href="#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="tu bqn agk">
                <div class="tv">
                  <div class="bql">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="bqm">
                    <small class="axr">
                      <a href="#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <img class="wg bqa wp yy agc" src="assets/img/avatar-dhg.png">
              </li>

              <li class="tu agk">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                <div class="tv">
                  <div class="bql">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="bql">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="bql">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="bqm">
                    <small class="axr">
                      <a href="#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="tu agk">
                <img class="wg bqa wp yy agc" src="assets/img/avatar-mdo.png">
                <div class="tv">
                  <div class="bql">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="bql">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="bqm">
                    <small class="axr">
                      <a href="#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="cd fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="bqy" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <h4 class="modal-title">Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body agv">
        <div class="azd">
          <ul class="bqe cj ca">
            <li class="b">
              <div class="tu aey">
                <img class="bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                <div class="tv">
                  <button class="cg pl pz aec">
                    <span class="c bqz"></span> Follow
                  </button>
                  <strong>Jacob Thornton</strong>
                  <p>@fat - San Francisco</p>
                </div>
              </div>
            </li>
            <li class="b">
              <div class="tu aey">
                <img class="bqa wp yy agc" src="assets/img/avatar-dhg.png">
                <div class="tv">
                  <button class="cg pl pz aec">
                    <span class="c bqz"></span> Follow
                  </button>
                  <strong>Dave Gamache</strong>
                  <p>@dhg - Palo Alto</p>
                </div>
              </div>
            </li>
            <li class="b">
              <div class="tu aey">
                <img class="bqa wp yy agc" src="assets/img/avatar-mdo.png">
                <div class="tv">
                  <button class="cg pl pz aec">
                    <span class="c bqz"></span> Follow
                  </button>
                  <strong>Mark Otto</strong>
                  <p>@mdo - San Francisco</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

    @yield('content')

    
</body></html>


