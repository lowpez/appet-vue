<template>
    <div class="loader-cover" v-show="loading">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="loader"></div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    loading: {
      default: true,
      type: Boolean
    }
  }
}
</script>

<style lang="css">
  .loader-cover{
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 99999;
  }

  .loader-cover > .container-fluid, .loader-cover > .container-fluid > .row{
    height: 100%;
  }

  .loader {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #00fff7; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      position: fixed;
      z-index: 999;
      overflow: visible;
      margin: auto;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
  }

  @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
  }
</style>
