import ButtonComponent from "./ButtonComponent";

export default {
    title: 'ButtonComponent',
    component: ButtonComponent
}

export const Button = () => ({
    components: {ButtonComponent},
    template: '<button-component :handle-submit="handleButton" text="Click me"></button-component>',
    methods: {
        handleButton() {
            console.log("do things when button is clicked");
        }
    }
});
