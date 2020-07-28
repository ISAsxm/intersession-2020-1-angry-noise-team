import vue from 'vue';
import '../../../../public/css/app.css';
import ExampleComponent from './ExampleComponent.vue';

export default {
  title: 'ExampleComponent',
  component: ExampleComponent
};

export const Example = () => ({
  components: {ExampleComponent},
  template: '<example-component></example-component>'
});

export const ExampleWithAditionnalContent = () => ({
  components: {ExampleComponent},
  template: '<example-component content="Modifiez moi dans resources/js/components/Example/ExampleComponent.stories.js"></example-component>'
});