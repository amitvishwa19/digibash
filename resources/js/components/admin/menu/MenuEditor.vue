// <template>
  <div>
    <!-- Page title -->
    <div class="mg-b-20">
      <h4>
        {{page_title}}
        <a
          href="#newMenuItem"
          class="btn btn-primary btn-xs"
          v-if="menu_selected"
          data-toggle="modal"
        >Add Menu Item</a>
      </h4>
    </div>
    <!-- Page title -->

    <!-- Menu page options -->
    <div class="col-md-4 mg-b-10" v-if="menu_selected">
      <span>
        <a href="#" @click.prevent="updateMenu">Edit</a>
      </span>
      <span class="mg-l-10">
        <a href="#" @click.prevent="deleteMenu">Delete</a>
      </span>
    </div>
    <!-- Menu page options -->

    <!-- Menu info -->
    <div class="alert alert-primary" role="alert" style="margin:0">
      <b>How To Use:</b>
      <p>
        You can output a menu anywhere on your site by calling
        <b>menu('name')</b>
      </p>
    </div>
    <!-- Menu info -->

    <!-- Menu Selector Title-->
    <div class="d-flex mg-t-30" v-if="menu_selector">
      <span class="mg-r-5">Select the menu you want to edit</span>

      <select
        name="selectedmenu"
        id
        class="mg-r-5"
        required
        v-model="selected_menu"
        style="margin-top:-4px"
      >
        <option value selected>--Select Menu--</option>
        <option v-for="menu in menus" v-bind:key="menu.id" v-bind:value="menu">{{menu.name}}</option>
      </select>

      <a
        href="#"
        class="btn btn-primary btn-xs mg-r-10"
        @click.prevent="selectmenu"
        style="margin-top:-4px"
      >Select Menu</a>
      or
      <a
        href="#menuform"
        class="mg-l-10"
        data-toggle="modal"
        style="margin-top:2px"
      >Create new menu</a>
    </div>
    <!-- Menu Selector Title-->

    <button class="btn btn-dark btn-xs" @click="menuItems">Menu items</button>

    <!-- Modals -->
    <div id="modal">
      <Menu :type="menu_type" :menu="this.selected_menu" @menuUpdated="menuUpdated"></Menu>
      <MenuItem :type="menu_item_type"></MenuItem>
    </div>
    <!-- Modals -->
  </div>
</template>

<script>
import Menu from "./Menu.vue";
import MenuItem from "./MenuItem.vue";

export default {
  data() {
    return {
      page_title: "Menus",
      menu_selector: true,
      menu_selected: false,
      //add_new_menu: false,
      //select_menu_option: true,
      selected_menu: "",
      //new_menu: "",
      menus: {},
      menu_items: [],
      menu_type: "add",
      menu_item_type: "add",
      errors: {}
    };
  },
  components: {
    MenuItem: MenuItem,
    Menu: Menu
  },
  watch: {
    selected_menu() {}
  },
  methods: {
    cancel() {
      this.new_menu_form = false;
    },
    selectmenu() {
      if (this.selected_menu) {
        //NProgress.start();
        this.page_title = "Menu (" + this.selected_menu.name + ")";
        this.menu_selector = false;
        this.menu_selected = true;
      } else {
        toast({
          type: "error",
          title: "Please select a menu"
        });
      }
    },
    deleteMenu() {
      swalWithBootstrapButtons({
        title: "Delete Selected Menu?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        reverseButtons: true
      }).then(result => {
        if (result.value) {
          axios
            .delete("menu/" + this.selected_menu.id)
            .then(res => {
              this.menus = res.data;
              this.selected_menu = "";
              this.menu_selector = true;
              this.menu_selected = false;
              this.page_title = "Menu";
              toast({
                type: "success",
                title: "Menu deleted successfully"
              });
            })
            .catch(err => console.log("Error is :" + err));
        }
      });
    },
    createMenu() {
      axios
        .post("menu", { type: "menu", menu_name: this.new_menu })
        .then(res => {
          this.menus = res.data;
          this.add_new_menu = false;
          this.menu = {};
          toast({
            type: "success",
            title: "Menu added successfully"
          });
        })
        .catch(err => console.log(err));
    },
    menuUpdated(e) {
      console.log(e.type);
      if (e.type == "added") {
        this.menus.unshift(e.data);
      } else {
        console.log(e.data);
        this.selected_menu = e.data;
        this.page_title = "Menu (" + this.selected_menu.name + ")";
      }
    },
    updateMenu() {
      this.menu_type = "update";
      $("#menuform").modal("show");
    },
    menuItems() {
      axios
        .get("menu/" + "1")
        .then(res => {
          console.log(res.data);
        })
        .catch();
    }
  },
  mounted() {
    axios
      .get("menu/create")
      .then(res => {
        this.menus = res.data;
      })
      .catch();
  }
};
</script>

<style type="text/css" scoped>
.btn-danger {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
  margin-right: 10px;
}
</style>