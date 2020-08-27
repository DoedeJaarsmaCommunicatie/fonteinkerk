import './bootstrap';
import Ready from './tools/Ready';
import Router from './tools/Router';

const common = async () =>
    (await import(/* webpackChunkName: "dist/scripts/routes/common" */'./routes/Common')).default;
const home = async () =>
    (await import(/* webpackChunkName: "dist/scripts/routes/home" */ './routes/Home')).default;
const singleWoning = async () =>
    (await import(/* webpackChunkName: "dist/scripts/routes/single-woning" */ './routes/single/Woning')).default;

const routes = new Router({
    common,
    home,
    singleWoning
});

Ready(() => routes.loadEvents());
