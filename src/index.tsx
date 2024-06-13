import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';

const ChatPage = () => {
    return <div>Placeholder for chat page</div>;
};

domReady(() => {
    const rootNode = document.getElementById('wp-ai-assistant');
    if ( ! rootNode ) {
        console.error( 'No element "wp-ai-assistant"');
        return;
    }

    const root = createRoot( rootNode );
    root.render(<ChatPage />);
});