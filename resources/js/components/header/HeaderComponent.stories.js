import HeaderComponent from "./HeaderComponent";

export default {
    title: 'HeaderComponent',
    component: HeaderComponent
};

export const Example = () => ({
    components: {HeaderComponent},
    template: '<header-component></header-component>'
});
