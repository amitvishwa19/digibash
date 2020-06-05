<template>
  <div>
    <div class="modal fade" id="newMenuItem" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">{{form_title}}</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="createMenu">
              <div class="form-group wpinput">
                <label for="exampleInputEmail1">Menu Name</label>
                <input type="text" class="form-control" name="name" v-model="menu_title" />
              </div>

              <div class="form-group wpinput">
                <label for="exampleInputEmail1" col-md-10>Link Type</label>
                <select class="form-control" v-model="link_type">
                  <option value>Static URL</option>
                  <option value>Dynamic Route</option>
                </select>
              </div>

              <div class="form-group wpinput">
                <label for="exampleInputEmail1">URL for the Menu Item</label>
                <input type="text" class="form-control" name="name" v-model="route_url" />
              </div>

              <div class="form-group wpinput">
                <label for="exampleInputEmail1">Additional Class</label>
                <input type="text" class="form-control" name="name" v-model="additional_class" />
              </div>

              <div class="form-group wpinput">
                <label for="exampleInputEmail1">Icon Class</label>
                <input type="text" class="form-control" name="name" v-model="icon_class" />
              </div>

              <div class="form-group wpinput">
                <label for="exampleInputEmail1">Open In</label>
                <select class="form-control" v-model="open_type">
                  <option value>Same Tab/Window</option>
                  <option value>New Tab/Window</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark tx-13" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary tx-13">Create</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["type"],
  data() {
    return {
      form_title: "Create a new Menu Item",
      menu_title: "",
      link_type: "",
      route_url: "",
      additional_class: "",
      icon_class: "",
      open_type: ""
    };
  }
};
</script>

<style scoped>
</style>