<div class="row">
    <x-box :color="'bg-info'" :count="$productCount"
    :title="'Количество товаров'" :link="route('admin.product.index')"></x-box>

    <x-box :color="'bg-warning'" :count="$usersCount"
    :title="'Пользователей сайта'" :link="route('admin.user.index')"></x-box>

</div>
