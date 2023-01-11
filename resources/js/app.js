
import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import MainApp from './components/ExampleComponent.vue';

const app = createApp(App);

app.component('example-component', ExampleComponent);

// createApp(App).mount('#app');

app.mount('#app');
