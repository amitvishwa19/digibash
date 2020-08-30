<template>
  <section>
    <div class="col-md-12 col-xs-12">
      <vue-dropzone
        id="dropzone"
        :options="dropzoneOptions"
        :useCustomSlot="true"
        v-on:vdropzone-queue-complete="sendingEvent"
        ref="dropzone"
      >
        <div class="dropzone-custom-content">
          <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
          <div class="subtitle">...or click to select a file from your computer</div>
        </div>
      </vue-dropzone>
    </div>
    <div class="col-12 mg-t-40">
      <div class="row">
        <div class="col-3 thumb mg-b-20" v-for="(m, key) in media" v-bind:key="key">
          <img
            v-bind:src="m.url"
            class="img-thumbnail"
            alt="Responsive image"
            style="height:150px !important;width:150px;"
          />
          <div class="actions mg-l-5">
            <a href>
              <i class="fa fa-download"></i>
            </a>
            <a
              href
              v-on:click.prevent
              data-container="body"
              data-toggle="popover"
              data-placement="right"
              data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
            >
              <i class="fa fa-link"></i>
            </a>
            <a href v-on:click.prevent @click="deleteimage(m.id)">
              <i class="fa fa-trash"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script type="text/javascript">
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
var currentFile = null;

import { VTooltip, VPopover, VClosePopover } from "v-tooltip";
Vue.directive("tooltip", VTooltip);

export default {
  components: {
    vueDropzone: vue2Dropzone,
  },
  data() {
    return {
      dropzoneOptions: {
        url: "media",
        thumbnailWidth: 200,
        thumbnailheight: 50,
        dictDefaultMessage: "<i class='fa fa-cloud-upload'></i>UPLOAD ME",
        headers: {
          "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]")
            .content,
        },
      },
      media: {},
    };
  },
  watch: {},
  methods: {
    sendingEvent() {
      axios
        .get("media/create")
        .then((response) => {
          this.media = response.data;
        }) //this.appointments=response.data
        .catch((error) => console.log(error));

      toast({
        type: "success",
        title: "Media added successfully",
      });
      //window.location.reload(true);
    },
    copyurl(url) {
      Document.execCommand("copy");
      toast({
        type: "success",
        title: "Media URL Copied successfully",
      });
    },
    deleteimage(id) {
      swalWithBootstrapButtons({
        title: "Delete media?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          axios
            .delete("media/" + id)
            .then((response) => {
              this.media = response.data;
            })
            .catch((error) => {});
          toast({
            type: "success",
            title: "Media deleted successfully",
          });
        }
      });
    },
  },
  created() {
    axios
      .get("media/create")
      .then((response) => {
        this.media = response.data;
      }) //this.appointments=response.data
      .catch((error) => console.log(error));
  },
};
</script>

<style lang="scss" Scoped>
.thumb {
  position: relative;
  .actions {
    position: absolute;
    top: 10px;
    left: 30px;
    display: none;
    background-color: #22282f;
    border-radius: 4px;
    cursor: pointer;
    i {
      margin: 10px;
      color: #fff;
    }
  }
}
.thumb:hover {
  .actions {
    display: block;
  }
}
#dropzone {
  border: 2px dashed #0073aa;
  padding: 0;
  margin: 0;
  height: 240px;
}
.dropzone-custom-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.dropzone-custom-title {
  margin-top: 0;
  color: #0073aa;
}

.subtitle {
  color: #0073aa;
}

.dz-image {
  margin: 0;
  height: 200px;
}
.gal-area {
  padding: 20px 0;
}
.thumb-img {
  i {
    color: red;
  }
  .feather {
    color: red;
    cursor: pointer;
  }
}
</style>
