import { ref } from 'vue';
import { defineStore } from 'pinia';
import _ from 'lodash';

export default () => {
  return defineStore('appDialog', () => {
    const paramsDefault = (merge={}) => {
      merge = _.merge({
        type: false,
        title: '',
        text: '',
        onSuccess: false,
        onError: false,
      }, merge);
      merge.onSuccess = typeof merge.onSuccess=='function'? merge.onSuccess : () => {};
      merge.onError = typeof merge.onError=='function'? merge.onError : () => {};
      return merge;
    };

    const show = ref(false);
    const params = ref(paramsDefault());
    const actions = ref([]);

    const _alert = (params={}) => {
      show.value = true;
      params.value = paramsDefault(params);

      actions.value = [
        {
          text: 'No',
          bind: {
            onClick: (ev) => {
              show.value = false;
              params.value.onSuccess(ev);
            },
          },
        },
      ];
    };

    const _confirm = (params={}) => {
      show.value = true;
      params.value = paramsDefault(params);
      actions.value = [];
    };
    
    return { 
      alert: _alert,
      confirm: _confirm,
      show,
      params,
      actions,
    };
  })();
};