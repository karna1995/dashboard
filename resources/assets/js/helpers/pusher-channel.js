import Pusher from 'pusher-js';

const pusher = new Pusher(dashboard.pusherKey, {
    authEndpoint: '/pusher/authenticate',
    cluster: dashboard.pusherCluster
});

const pusherChannel = pusher.subscribe('private-dashboard');

export default pusherChannel;
