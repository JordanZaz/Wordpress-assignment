import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, Button } from '@wordpress/components';
import { useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';



registerBlockType('my-custom-greeting-block/greeting', {
    apiVersion: 2,
    edit: (props) => {
        const blockProps = useBlockProps();
        const { attributes, setAttributes } = props;
        const [responseMessage, setResponseMessage] = useState('');
        const [isSending, setIsSending] = useState(false);

        const sendGreeting = async () => {
            setIsSending(true);
            try {
                const response = await fetch('http://127.0.0.1:8081/wp-json/my-greeting-plugin/v1/greeting', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Basic ' + btoa('JordanZaz:6EKb CdKA WpvM S9zX h01C plJc'),
                    },
                    body: JSON.stringify({
                        greeting: attributes.greeting,
                    }),
                });
                setResponseMessage('Greeting sent successfully!');
            } catch (error) {
                setResponseMessage('Error sending greeting!');
            }
            setIsSending(false);
        };


        return (
            <div {...blockProps}>
                <TextControl
                    label="Enter your greeting:"
                    value={attributes.greeting}
                    onChange={(greeting) => setAttributes({ greeting })}
                />
                <Button
                    isPrimary
                    onClick={sendGreeting}
                    disabled={!attributes.greeting || isSending}
                >
                    Send Greeting
                </Button>
                {responseMessage && <p>{responseMessage}</p>}
            </div>
        );
    },

    save: () => {
        return null;
    },
});
