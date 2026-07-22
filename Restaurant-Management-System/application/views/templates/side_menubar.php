<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">

      <li id="dashboardMainMenu">
        <a href="<?= site_url('dashboard') ?>">
          <i class="fa fa-tachometer"></i> <span>Dashboard</span>
        </a>
      </li>

      <?php if ($user_permission): ?>
        <?php
        $menuItems = [
          'Users' => [
            'icon' => 'fa-users',
            'permissions' => ['createUser','updateUser','viewUser','deleteUser'],
            'id' => 'userMainNav',
            'submenus' => [
              'Add User'     => ['createUser','users/create','fa-user-plus'],
              'Manage Users' => ['viewUser','users','fa-list'],
            ],
          ],
          'Groups' => [
            'icon' => 'fa-shield',
            'permissions' => ['createGroup','updateGroup','viewGroup','deleteGroup'],
            'id' => 'groupMainNav',
            'submenus' => [
              'Add Group'     => ['createGroup','groups/create','fa-plus'],
              'Manage Groups' => ['viewGroup','groups','fa-list'],
            ],
          ],
          'Stores' => [
            'icon' => 'fa-building',
            'permissions' => ['createStore','updateStore','viewStore','deleteStore'],
            'id' => 'storesMainNav',
            'link' => 'stores/',
          ],
          'Tables' => [
            'icon' => 'fa-table',
            'permissions' => ['createTable','updateTable','viewTable','deleteTable'],
            'id' => 'tablesMainNav',
            'link' => 'tables/',
          ],
          'Category' => [
            'icon' => 'fa-tags',
            'permissions' => ['createCategory','updateCategory','viewCategory','deleteCategory'],
            'id' => 'categoryMainNav',
            'link' => 'category/',
          ],
          'Products' => [
            'icon' => 'fa-cube',
            'permissions' => ['createProduct','updateProduct','viewProduct','deleteProduct'],
            'id' => 'productMainNav',
            'submenus' => [
              'Add Product'     => ['createProduct','products/create','fa-plus'],
              'Manage Products' => ['viewProduct','products','fa-list'],
            ],
          ],
          'Orders' => [
            'icon' => 'fa-shopping-cart',
            'permissions' => ['createOrder','updateOrder','viewOrder','deleteOrder'],
            'id' => 'OrderMainNav',
            'submenus' => [
              'Add Order'     => ['createOrder','orders/create','fa-plus'],
              'Manage Orders' => ['viewOrder','orders','fa-list'],
            ],
          ],
          'Reports' => [
            'icon' => 'fa-bar-chart',
            'permissions' => ['viewReport'],
            'id' => 'ReportMainNav',
            'submenus' => [
              'Product Wise'      => ['viewReport','reports','fa-line-chart'],
              'Total Store Wise'  => ['viewReport','reports/storewise','fa-pie-chart'],
            ],
          ],
          'Company' => [
            'icon' => 'fa-briefcase',
            'permissions' => ['updateCompany'],
            'id' => 'companyMainNav',
            'link' => 'company/',
          ],
          'Profile' => [
            'icon' => 'fa-user-circle',
            'permissions' => ['viewProfile'],
            'id' => 'profileMainNav',
            'link' => 'users/profile/',
          ],
          'Settings' => [
            'icon' => 'fa-cog',
            'permissions' => ['updateSetting'],
            'id' => 'settingMainNav',
            'link' => 'users/setting/',
          ],
        ];

        foreach ($menuItems as $menuName => $menu):
          $hasPermission = false;
          foreach ($menu['permissions'] as $perm) {
            if (in_array($perm, $user_permission)) { $hasPermission = true; break; }
          }
          if (!$hasPermission) continue;

          if (isset($menu['submenus'])): ?>
            <li class="treeview" id="<?= $menu['id'] ?>">
              <a href="#">
                <i class="fa <?= $menu['icon'] ?>"></i>
                <span><?= $menuName ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <?php foreach ($menu['submenus'] as $subName => $sub):
                  if (in_array($sub[0], $user_permission)): ?>
                    <li><a href="<?= site_url($sub[1]) ?>"><i class="fa <?= $sub[2] ?>"></i> <?= $subName ?></a></li>
                <?php endif; endforeach; ?>
              </ul>
            </li>
          <?php else: ?>
            <li id="<?= $menu['id'] ?>">
              <a href="<?= site_url($menu['link']) ?>">
                <i class="fa <?= $menu['icon'] ?>"></i> <span><?= $menuName ?></span>
              </a>
            </li>
          <?php endif;
        endforeach; ?>
      <?php endif; ?>

      <li>
        <a href="<?= site_url('auth/logout') ?>">
          <i class="fa fa-sign-out"></i> <span>Sign Out</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
