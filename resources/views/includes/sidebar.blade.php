<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
      data-accordion="false">
      <x-sidebar-items :title="'Пользователи'"
      :link="route('admin.user.index')" :icon="'fas fa-users'"></x-sidebar-items>

      <x-sidebar-items :title="'Категории'"
      :link="route('admin.category.index')" :icon="'fas fa-list'"></x-sidebar-items>

      <x-sidebar-items :title="'Подкатегории'"
      :link="route('admin.subcategory.index')" :icon="'fas fa-stream'"></x-sidebar-items>

      <x-sidebar-items :title="'Цвета'"
      :link="route('admin.color.index')" :icon="'fas fa-palette'"></x-sidebar-items>

      <x-sidebar-items :title="'Компании'"
      :link="route('admin.company.index')" :icon="'fab fa-adn'"></x-sidebar-items>

      <x-sidebar-items :title="'Товары'"
      :link="route('admin.product.index')" :icon="'fas fa-tshirt'"></x-sidebar-items>
  </ul>
</nav>
