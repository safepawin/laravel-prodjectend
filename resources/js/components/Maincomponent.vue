<template>
  <div>
    <nav class="navbar navbar-light bg-danger sticky-top">
      <div class="container">
        <a class="navbar-brand text-white">สินค้าทั้งหมดตอนนี้ 1000 รายการรอคุณอยู่</a>
        <form class="form-inline my-2">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
            v-model="search"
            @input="searchProduct"
          />
          <!-- <button
            class="btn btn-outline-success my-2 my-sm-0"
            type="button"
            @click="searchProduct"
          >Search</button> -->
        </form>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-3 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3>ประเภทสินค้า</h3>
            </div>
            <div class="card-body">
              <div class="form-check">
                <label class="form-check-label">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="fliter"
                    id="default"
                    @change="defaultFilter()"
                    checked
                  />
                  Default
                </label>
              </div>
              <div class="form-check" v-for="filter in filters" :key="filter.id" :value="filter.id">
                <label class="form-check-label" :for="filter.id">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="fliter"
                    :id="filter.id"
                    @change="checkFilter(filter.id)"
                  />
                  {{filter.category_name}}
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-sm-12" v-if="products.length >=1">
          <div class="row">
            <div class="col-12 border-bottom">
              <div class="row">
                <div class="col-lg-6 col-sm-6 mr-auto">
                  <h3>รายการสินค้า</h3>
                  <p>ค้นพบสินค้าจำนวน {{products.length}}</p>
                </div>
                <div class="col-lg-6 col-sm-6 ml-auto">
                  <!-- <button class="btn" @click="toggleSort()">
                    <i :class="{'fas fa-sort-amount-down':sort,'fas fa-sort-amount-up':!sort}"></i>
                  </button>-->
                  <div class="dropdown text-right">
                    <button
                      class="btn btn-secondary dropdown-toggle mb-2"
                      type="button"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >การจัดเรียง</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item" @click="sortHighToLow">ราคาสูงสุด - ต่ำสุด</button>
                      <button class="dropdown-item" @click="sortLowToHigh">ราคาต่ำสุด - สูงสุด</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6 p-3" v-for="product in products" :key="product.id" >
              <a :href="product.product_quantity >= 1 ? 'product/'+product.id : ''">
                <img class="rounded-lg border w-100" width="180px" height="120px" :src="'images/'+product.preview_image" alt="product" />
              </a>
              <p>{{product.product_name }}</p>
              <span>
                ราคา
                <b>{{product.product_price}}</b>
              </span>
              <span>
                คงเหลือ
                <b :class="product.product_quantity >=1 ? '' : 'text-danger'">{{product.product_quantity >=1 ? product.product_quantity : 'สินค้าหมด'}}</b>
              </span>
            </div>
          </div>
        </div>
        <div class="col-9" v-else>
            <h1 class="text-center">ไม่มีสินค้า</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// function getImage(id){
//      axios.get('http://projectend.test:8080/api/product/productimage/'+id).then(res=>{
//             console.log('iamges: ',res.data[0].product_image)
//             return res.data[0].product_image
//      })
// }
export default {
  mounted() {
    this.getProductFilter();
    this.getProductAll();
    console.log("mounted");
  },
  data() {
    return { search: "", filters: [], products: [], filterId: "", sort: false,img:'' };
  },
  methods: {
    getProductAll() {
      axios.get("/api/product").then(result => {
        this.products = result.data;
        console.log(this.products);
      });
    },
    getProductFilter() {
      axios
        .get("/api/productfilter")
        .then(result => {
          this.filters = result.data;
          console.log(this.filters);
        });
    },
    checkFilter(id) {
      this.filterId = id;
      axios
        .put(`/api/productfilter/${id}`)
        .then(result => {
          this.products = result.data;
          console.log(this.products);
        });
    },
    searchProduct() {
      if (this.search !== "") {
        axios
          .get(`/api/product/search/${this.search}`)
          .then(result => {
            this.products = result.data;
            console.log(this.products);
          });
      } else {
        this.getProductAll();
      }
    },
    defaultFilter() {
        this.filterId = ''
      axios.get("/api/product").then(result => {
        this.products = result.data;
        console.log(this.products);
      });
    },
    sortLowToHigh() {
      axios
        .get(
          `/api/productfliter/asc/${this.filterId}`
        )
        .then(result => {
          this.products = result.data;
          console.log(result.data);
        });
    },
    sortHighToLow() {
      axios
        .get(
          `/api/productfliter/desc/${this.filterId}`
        )
        .then(result => {
          this.products = result.data;
          console.log(result.data);
        });
    }
  }
};
</script>
