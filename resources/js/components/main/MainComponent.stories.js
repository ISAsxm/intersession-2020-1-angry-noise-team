import MainComponent from "./MainComponent";

export default {
    title: 'MainComponent',
    component: MainComponent
};

export const Example = () => ({
    components: {MainComponent},
    template: '<main-component></main-component>'
});
