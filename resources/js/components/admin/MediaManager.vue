<template>
  <div></div>
</template>

<script>
export default {
  props: {
    basePath: {
      type: String,
      default: "/"
    },
    filename: {
      type: String,
      default: null
    },
    allowMultiSelect: {
      type: Boolean,
      default: true
    },
    maxSelectedFiles: {
      type: Number,
      default: 0
    },
    minSelectedFiles: {
      type: Number,
      default: 0
    },
    showFolders: {
      type: Boolean,
      default: true
    },
    showToolbar: {
      type: Boolean,
      default: true
    },
    allowUpload: {
      type: Boolean,
      default: true
    },
    allowMove: {
      type: Boolean,
      default: true
    },
    allowDelete: {
      type: Boolean,
      default: true
    },
    allowCreateFolder: {
      type: Boolean,
      default: true
    },
    allowRename: {
      type: Boolean,
      default: true
    },
    allowCrop: {
      type: Boolean,
      default: true
    },
    allowedTypes: {
      type: Array,
      default: function() {
        return [];
      }
    },
    preSelect: {
      type: Boolean,
      default: true
    },
    element: {
      type: String,
      default: ""
    },
    details: {
      type: Object,
      default: function() {
        return {};
      }
    }
  },
  data: function() {
    return {
      current_folder: this.basePath,
      selected_files: [],
      files: [],
      is_loading: true,
      hidden_element: null,
      expanded: true,
      modals: {
        new_folder: {
          name: ""
        },
        move_files: {
          destination: ""
        }
      }
    };
  },
  computed: {
    selected_file: function() {
      return this.selected_files[0];
    }
  },
  method: {},
  mounted() {
    console.log("Media manager mounted");
  }
};
</script>

<style scoped>
</style>