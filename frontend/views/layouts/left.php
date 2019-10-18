<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Nasir</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Master',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Times Slot', 'icon' => 'file-code-o', 'url' => ['/times'],],
                            ['label' => 'Open Days', 'icon' => 'dashboard', 'url' => ['/day'],],
                            ['label' => 'Holiday Dates', 'icon' => 'dashboard', 'url' => ['/holiday-date'],],
                            [
                                'label' => 'Holiday',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Yearly Rule', 'icon' => 'circle-o', 'url' => '#',],
                                    ['label' => 'Monthly Rule', 'icon' => 'circle-o', 'url' => '#',],
                                    ['label' => 'Weekly Rule', 'icon' => 'circle-o', 'url' => '#',],
                                ],
                            ],
                           // ['label' => 'Holiday Yearly', 'icon' => 'dashboard', 'url' => ['/debug'],],
                           // ['label' => 'Holiday Monthly', 'icon' => 'dashboard', 'url' => ['/debug'],],
                           // ['label' => 'Holiday Weeks', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ]
                    ],
                    [
                        'label' => 'Transaction',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'sales', 'icon' => 'file-code-o', 'url' => ['/debug'],],
                            ['label' => 'purchase', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            ['label' => 'expense', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            ['label' => 'reprint', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ]
                    ],

                    [
                        'label' => 'Reports',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/debug'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ]
                    ],
                    
                    /* [
                        'label' => 'Master',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ], */
                ],
            ]
        ) ?>

    </section>

</aside>
