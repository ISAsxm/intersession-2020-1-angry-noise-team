import NavComponent from "./NavComponent";

export default {
    title: 'NavComponent',
    component: NavComponent
};

export const Example = () => ({
    components: {NavComponent},
    template: '<nav-component></nav-component>'
});
