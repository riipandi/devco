#!/usr/bin/env python3

# run: gunicorn -b 127.0.0.1:6465 sample:api

from falcon import falcon

APP_URL='https://api.devco.id'

class QuoteResource:
    def on_get(self, req, resp):
        """Handles GET requests"""
        result = {
            'current_user_url': APP_URL + '/user',
            'current_user_authorizations_html_url': 'https://devco.id/settings/connections/applications{/client_id}',
            'authorizations_url': APP_URL + '/authorizations',
            'code_search_url': APP_URL + '/search/code?q={query}{&page,per_page,sort,order}',
            'commit_search_url': APP_URL + '/search/commits?q={query}{&page,per_page,sort,order}',
            'emails_url': APP_URL + '/user/emails',
            'emojis_url': APP_URL + '/emojis',
            'events_url': APP_URL + '/events',
            'feeds_url': APP_URL + '/feeds',
            'followers_url': APP_URL + '/user/followers',
            'following_url': APP_URL + '/user/following{/target}',
            'gists_url': APP_URL + '/gists{/gist_id}',
            'hub_url': APP_URL + '/hub',
            'issue_search_url': APP_URL + '/search/issues?q={query}{&page,per_page,sort,order}',
            'issues_url': APP_URL + '/issues',
            'keys_url': APP_URL + '/user/keys',
            'notifications_url': APP_URL + '/notifications',
            'organization_repositories_url': APP_URL + '/orgs/{org}/repos{?type,page,per_page,sort}',
            'organization_url': APP_URL + '/orgs/{org}',
            'public_gists_url': APP_URL + '/gists/public',
            'rate_limit_url': APP_URL + '/rate_limit',
            'repository_url': APP_URL + '/repos/{owner}/{repo}',
            'repository_search_url': APP_URL + '/search/repositories?q={query}{&page,per_page,sort,order}',
            'current_user_repositories_url': APP_URL + '/user/repos{?type,page,per_page,sort}',
            'starred_url': APP_URL + '/user/starred{/owner}{/repo}',
            'starred_gists_url': APP_URL + '/gists/starred',
            'team_url': APP_URL + '/teams',
            'user_url': APP_URL + '/users/{user}',
            'user_organizations_url': APP_URL + '/user/orgs',
            'user_repositories_url': APP_URL + '/users/{user}/repos{?type,page,per_page,sort}',
            'user_search_url': APP_URL + '/search/users?q={query}{&page,per_page,sort,order}'
        }

        resp.media = result

def handle_404(req, resp):
    resp.status = falcon.HTTP_404
    # resp.body = 'Resource not found'
    resp.media = {
        'message': 'Not Found',
        'documentation_url': 'https://github.com/riipandi/devco'
    }

api = falcon.API()
api.add_route('/', QuoteResource())
api.add_sink(handle_404, '')
