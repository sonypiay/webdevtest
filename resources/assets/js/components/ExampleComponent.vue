<template>
<div>
  <div uk-slideshow="animation: push; autoplay: true; ration: false">
    <div class="uk-position-relative uk-visible-toggle uk-light">
      <ul class="uk-slideshow-items" uk-height-viewport>
        <li v-for="asset in assets">
          <img @click="redirectTarget(asset.target)" class="uk-width-1-1" v-if="getWidthWindow <= 414" :src="url + '/qeon_assets/' + asset.mobile" :alt="asset.mobile" uk-cover>
          <img @click="redirectTarget(asset.target)" class="uk-width-1-1" v-else-if="getWidthWindow >= 768 && getWidthWindow <= 1024" :src="url + '/qeon_assets/' + asset.tablet" :alt="asset.tablet" uk-cover>
          <img @click="redirectTarget(asset.target)" class="uk-width-1-1" v-else :src="url + '/qeon_assets/' + asset.desktop" :alt="asset.desktop" uk-cover>
        </li>
      </ul>
      <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
      <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
      <div class="uk-position-bottom-center uk-position-medium">
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: ['url'],
  data() {
    return {
      assets: [],
      widthWindow: 0
    }
  },
  methods: {
    redirectTarget(redirect) {
      document.location = redirect;
    },
    getAssets() {
      axios({
        method: 'get',
        url: this.url + '/assets'
      }).then( res => {
        let result = res.data;
        this.assets = result.data;
        console.log( this.assets );
      }).catch( err => {
        console.log(err.response.status);
      });
    },
  },
  computed: {
    getWidthWindow() {
      return this.widthWindow = window.innerWidth;
    }
  },
  mounted() {
    this.getAssets();
  }
}
</script>
