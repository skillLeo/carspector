curl --location --request POST 'https://business-api.tiktok.com/open_api/v1.3/event/track/' \
    --header 'Access-Token: 1ff1655d9f72ae5c8aeadd694bd09ae09b7c4a97' \
    --header 'Content-Type: application/json' \
    --data-raw '{
        "event_source": "web",
        "event_source_id": "CTVQ93BC77U6098JJBV0",
        "event_id": "151515",
        "test_event_code": "TEST85892"
        "data": [
            {
                "event": "SubmitForm",
                "event_time": 946684800000,
                "user": {
                    "email": "5f9b9de089ae0398aed516f31e85cd189665f0525fea414bb0c931c692e5e2b9",
                    "phone_number": "65db01fb4642b16b83421fb250caf220958a44f5e68ecfcc86ddd2afa5599d61"
                },
                "properties": {
                    "currency": "EUR",
                    "value": 269,
                    "content_type": "product"
                }
            }
        ]
    }'
