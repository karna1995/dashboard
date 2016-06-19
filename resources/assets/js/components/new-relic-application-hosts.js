import Grid from './grid';
import Pusher from '../mixins/pusher';
import SaveState from '../mixins/save-state';

export default {

    template: `
             <grid :position="grid" modifiers="overflow padded blue">
                <section class="new-relic-application-hosts">
                    <h1>{{ application }}</h1>
                    <ul class="new-relic-application-hosts__hosts">
                        <li v-for="host in hosts"  class="new-relic-application-hosts__host">
                            <h2 class="new-relic-application-hosts__host__title">{{ host.host }}</h2>
                            <div class="new-relic-application-hosts__host__health">{{ host.health_status }}</div>
                        </li>
                    </ul>
                </section>
             </grid>
    `,

    components: {
        Grid,
    },

    mixins: [Pusher, SaveState],

    props: ['grid'],

    data() {
        return {
            events: [],
        };
    },

    methods: {
        getEventHandlers() {
            return {
                'App\\Components\\NewRelic\\Events\\ApplicationHostsHealthFetched': response => {
                    this.hosts = response.hosts;
                    this.application = response.application;
                },
            };
        },

        getSavedStateId() {
            return 'new-relic-application-hosts';
        },
    },
};
