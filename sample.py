#!/usr/bin/env python3

# run:
# gunicorn -b 127.0.0.1:6465 sample:api

from falcon import falcon

class QuoteResource:
    def on_get(self, req, resp):
        """Handles GET requests"""
        quote = {
            'quote': (
                "I've always been more interested in "
                "the future than in the past."
            ),
            'author': 'Grace Hopper'
        }

        resp.media = quote

api = falcon.API()
api.add_route('/', QuoteResource())
