Wrapper for the Active Collab API.
Login with an account, thus request and get a token, which will be used for authenticating the user with the API calls.
The application doesn't require any database connection. The app uses encrypted session based authentication. The authenticated Active Collab user is stored in the session. The user is authenticated against the 'active-collab' auth guard. The 'active-collab' guarded routes also get a client instane incejcted into the service container with the correct token, making api calls very easy.
Pagination for tasks is currently not possible by the active-collab api. However, the filter dto created by me does support pagination, ordering.
