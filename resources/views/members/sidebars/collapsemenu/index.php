<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <?php $flashSelected = 'collapsemenu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="_1dTWr _2kea1 njVXK TidTZ">
            <h1 class="_3vE3C _2gyiY"><?= $title ?></h1>
            <button type="button" data-toggle="modal" data-target="#addCollapseMenuModal" class="_2niE6 Bdn6B _1dYc3">Add
              New
              Submenu</button>
          </div>

          <div class="krQJT">

            <div class="_3JfU8 gqtmr">
              <table class="_12PUq -tn6h _6uPk6 s0VLt">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Submenu ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Url</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($collapsemenus as $key => $collapsemenu) : ?>
                    <tr>
                      <th class="khrLL"><?= $key + 1 ?></th>
                      <td class="khrLL"><?= $collapsemenu['subMenuId'] ?></td>
                      <td class="khrLL"><?= $collapsemenu['title'] ?></td>
                      <td class="khrLL"><?= $collapsemenu['url'] ?></td>
                      <td class="khrLL"><?= $collapsemenu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="khrLL"><?= implode(',', json_decode($collapsemenu['other'], true)['access']) ?></td>
                      <td class="khrLL">
                        <nav class="_4m9J6">
                          <div>
                            <button type="button" data-target="submenu-<?= $key ?>" data-alignment="right" class="_2zhDk _2QgNG _3VHKy _8y6Bn">
                              <svg width="15" height="15" fill="currentColor" class="_2i-WK">
                                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="submenu-<?= $key ?>" class="EYW33 _2dgNq _5OpzR">
                              <li>
                                <button onclick="setModalValue({editSubMenuId:'<?= $collapsemenu['subMenuId'] ?>',editSubMenuTitle:'<?= $collapsemenu['title'] ?>',editSubMenuUrl:'<?= $collapsemenu['url'] ?>',isSubMenuActiveEdit :'<?= $collapsemenu['isActive'] == 1 ? 'true' : 'false' ?>',editRole:'<?= implode(',', json_decode($collapsemenu['other'], true)['access']) ?>'},document.querySelector(`#updateSubMenuForm`));document.querySelector(`#updateSubMenuForm`).action = '<?= LINK ?>/members/sidemenu/submenu?id=<?= $collapsemenu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editCollapseMenuModal" class="_2niE6 _222Gi _2S6Up">Edit</button>
                              </li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/sidemenu/submenu?id=<?= $collapsemenu['id'] ?>&title=<?= $collapsemenu['title'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                  <button onclick="return confirm('Are you sure you want to Delete it ?')" class="_2niE6 cnWz7 _2S6Up">Delete</button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </nav>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include VIEW_DIR . "/members/sidebars/collapsemenu/addcollapsemenumodal.php"; ?>
    <?php include VIEW_DIR . "/members/sidebars/collapsemenu/editcollapsemenumodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>