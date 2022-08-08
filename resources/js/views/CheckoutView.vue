<template>
  <div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark">Product 1</a>
                          <small>
                            <span class="text-muted">Color:</span>
                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                            <span class="text-muted">Size: </span> EU 37 &nbsp;
                            <span class="text-muted">Ships from: </span> China
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">$57.55</td>
                    <td class="align-middle p-4"><input type="text" class="form-control text-center" value="2"></td>
                    <td class="text-right font-weight-semibold align-middle p-4">$115.1</td>
                    <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                  </tr>

                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->

            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="mt-2">
                    <div class="form-group mb-3">
                        <label class="form-label">Имя:</label>
                        <input class="form-control" v-model="customer.name" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Номер телефона:</label>
                        <input class="form-control" v-model="customer.phone" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Адрес:</label>
                        <input class="form-control" v-model="customer.address" type="text">
                    </div>
                </div>
                <div class="text-right">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong>$1164.65</strong></div>
                </div>
            </div>

            <div class="float-right">
              <button type="button" class="btn btn-lg btn-primary">Checkout</button>
            </div>

          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'Checkout',
    computed: {
        user() {
            return this.$store.getters.user
        },
        customer() {
            return {
                name: this.user.name,
                phone: this.user.phone,
                address: this.user.address,
            }
        }
    },
}
</script>

<style>

</style>
