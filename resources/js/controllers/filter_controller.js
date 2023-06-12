import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        filter: String,
        route: String,
    };

    change(event) {
        console.log(this.filterValue, 'hsh');
        console.log(event.target.value,'nnghia');
        document.dispatchEvent(
            new CustomEvent('filter:change', {
                detail: {
                    filter: this.filterValue,
                    route: this.routeValue,
                    value: event.target.value,
                },
            })
        );
    }
}
