<template>
  <div class="modal fade" id="menuform" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" v-if="type=='add'">Add New Menu</h6>
          <h6 class="modal-title" v-if="type=='update'">Update Menu ({{menu.name}})</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="form_action">
            <div class="form-group wpinput">
              <label for="exampleInputEmail1">Menu Name</label>
              <input type="text" class="form-control" name="menu_name" v-model="menu_name" focused />
              <small id="emailHelp" class="form-text text-muted">
                <i>The name is how it appears on your site</i>.
              </small>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
          <button
            type="button"
            class="btn btn-primary tx-13"
            @click="form_action"
          >{{action_button_title}}</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["menu", "type"],
  data() {
    return {
      form_type: "",
      menu_name: "",
      action_button_title: "Add Menu",
      men: {}
    };
  },
  computed: {},
  watch: {
    menu() {
      this.form_type = this.type;
      this.men = this.menu;
    },
    type() {
      if (this.type == "update") {
        this.action_button_title = "Update Menu";
        this.menu_name = this.menu.name;
      }
    }
  },
  mounted() {},
  methods: {
    addMenu() {
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
    updateMenu() {
      axios
        .patch("menu/" + this.men.id, {
          type: "menu",
          menu_name: this.men.name
        })
        .then(res => {
          console.log(res.data);
          this.men = res.data;
          this.$emit("menuUpdated", this.men);
        })
        .catch(err => console.log(err));

      $("#menuedit").modal("hide");
    },
    form_action() {
      if (this.type == "add") {
        axios
          .post("menu", { type: "menu", menu_name: this.menu_name })
          .then(res => {
            this.$emit("menuUpdated", { type: "added", data: res.data });
            this.menu_name = "";
            $("#menuform").modal("hide");
            toast({
              type: "success",
              title: "Menu added successfully"
            });
          })
          .catch(err => console.log(err));
      } else {
        axios
          .patch("menu/" + this.menu.id, {
            type: "menu",
            menu_name: this.menu_name
          })
          .then(res => {
            this.$emit("menuUpdated", { type: "updated", data: res.data });
            toast({
              type: "success",
              title: "Menu Updated successfully"
            });
          })
          .catch(err => console.log(err));

        $("#menuform").modal("hide");
      }
    }
  }
};
</script>

<style lang="sass" scoped>

</style>