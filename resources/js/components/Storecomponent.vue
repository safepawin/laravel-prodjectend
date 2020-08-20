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
            @input="searchStore"
          />
          <!-- <button
            class="btn btn-outline-success my-2 my-sm-0"
            type="button"
            @click="searchStore"
          >Search</button>-->
        </form>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row">
        <!-- <div class="col-3">
          <div class="card">
            <div class="card-header">
              <h3>ร้านค้า</h3>
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
                  {{filter.store_name}}
                </label>
              </div>
            </div>
          </div>
        </div>-->
        <div class="col-12">
          <div class="row">
            <div class="col-12 border-bottom">
              <div class="row">
                <div class="col-6 mr-auto">
                  <h3>รายชื่อร้านค้าทั้งหมด</h3>
                  <p>ค้นพบร้านค้าจำนวน {{stores.length}}</p>
                </div>
                <div class="col-6 ml-auto">
                  <!-- <button class="btn" @click="toggleSort()">
                    <i :class="{'fas fa-sort-amount-down':sort,'fas fa-sort-amount-up':!sort}"></i>
                  </button>-->
                  <!-- <div class="dropdown text-right">
                    <button
                      class="btn btn-secondary dropdown-toggle"
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
                  </div>-->
                </div>
              </div>
            </div>
            <div class="shadow  my-2 bg-white rounded row">
              <div class="col-3 p-3 shadow-sm" v-for="store in stores" :key="store.id">
                <a :href="'/store/'+store.id">
                  <img class="img img-fluid" :src="/images/+store.store_image" alt />
                </a>
                <p>{{store.store_name}}</p>
                <span>
                  <b class="d-none d-lg-inline">{{store.store_detail}}</b>
                </span>
                <span>
                  <b>{{store.start_store_at}}</b>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.getStoreFilter();
    this.getStoreAll();
    console.log("mounted");
  },
  data() {
    return { search: "", filters: [], stores: [], filterId: "", sort: false };
  },
  methods: {
    getStoreAll() {
      axios.get("/api/store").then((result) => {
        this.stores = result.data;
        console.log(this.stores);
      });
    },
    getStoreFilter() {
      axios.get("/api/storefilter").then((result) => {
        this.filters = result.data;
        console.log(this.filters);
      });
    },
    checkFilter(id) {
      this.filterId = id;
      axios.put(`/api/storefilter/${id}`).then((result) => {
        this.stores = result.data;
        console.log(this.stores);
      });
    },
    searchStore() {
      if (this.search !== "") {
        axios.get(`/api/store/search/${this.search}`).then((result) => {
          this.stores = result.data;
          console.log(this.stores);
        });
      } else {
        this.getStoreAll();
      }
    },
    defaultFilter() {
      axios.get("/api/storefilter").then((result) => {
        this.stores = result.data;
        console.log(this.stores);
      });
    },
  },
};
</script>
