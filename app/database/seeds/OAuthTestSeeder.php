<?php
class OAuthTestSeeder extends Seeder{

	const ACCESS_TOKEN = 'NOSnsXqNDFHDGXrSe8B8e8LdNFNIqCGjcJvJa1jp';

	public function run(){
		$expire = new DateTime();
		$expire->add(new DateInterval('P1M')); // one month
		$now = date('Y-m-d H:i:s');


		DB::table('oauth_clients')->delete();
		$values = array(1, 'asdf', 'browser', $now, $now);
		DB::insert('insert into oauth_clients (id, secret, name, created_at, updated_at) values (?, ?, ?, ?, ?)', $values);


		/*DB::table('oauth_scopes')->delete();
		 * $values = array(1, 'basic',  $now, $now);
		DB::insert('insert into oauth_scopes (id, description, created_at, updated_at) values (?, ?, ?, ?)', $values);*/

		DB::table('oauth_sessions')->delete();
		$values = array(1, 1, 'user', 1, $now, $now);
		DB::insert('INSERT INTO `oauth_sessions` (`id`, `client_id`, `owner_type`, `owner_id`, created_at, updated_at) VALUES (?, ?, ?, ?,?,?)', $values);

		DB::table('oauth_access_tokens')->delete();
		$values = array(1, 1, $expire->getTimestamp(), $now, $now);
		DB::insert('INSERT INTO `oauth_access_tokens` (`id`, `session_id`, `expire_time`, created_at, updated_at) VALUES (?, ?, ?, ?,?)', $values);

/*      DB::table('oauth_session_token_scopes')->delete();
		$values = array(1, 1, 1, $now, $now);
		DB::insert('INSERT INTO `oauth_session_token_scopes` (`id`, `session_access_token_id`, `scope_id`, created_at, updated_at) VALUES (?, ?, ?,?,?)', $values);*/
	}
}