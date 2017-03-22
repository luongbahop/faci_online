<?
  class RSS
  {
	public function RSS()
	{
		require_once ('../connect.php');
	}
	public function GetFeed()
	{
		return $this->getDetails() . $this->getItems();
	}
	private function dbConnect()
	{
		DEFINE ('LINK', mysql_connect ($host, $user,$pass));
	}
	private function getDetails()
	{
		$detailsTable = "tb_article_item";
		$this->dbConnect($detailsTable);
		$query = "SELECT * FROM ". $detailsTable;
		$result = mysql_db_query (DB_NAME, $query, LINK);
		while($row = mysql_fetch_array($result))
		{
			$details = '<?xml version="1.0" encoding="ISO-8859-1" ?>
				<rss version="2.0">
					<channel>
						<title>'. $row['title'] .'</title>
						<link>'. $row['title'] .'</link>
						<description>'. $row['description'] .'</description>
						<language>'. $row['lang'] .'</language>
						<image>
							<title>'. $row['title'] .'</title>
							<url>'. $row['image'] .'</url>
							<link>'. $row['title'] .'</link>
							<width>300</width>
							<height>300</height>
						</image>';
		}
		return $details;
	}
	private function getItems()
	{
		$itemsTable = "tb_article_item";
		$this->dbConnect($itemsTable);
		$query = "SELECT * FROM ". $itemsTable;
		$result = mysql_db_query (DB_NAME, $query, LINK);
		$items = '';
		while($row = mysql_fetch_array($result))
		{
			$items .= '<item>
				<title>'. $row["title"] .'</title>
				<link>'. $row["title"] .'</link>
				<description><![CDATA['. $row["description"] .']]></description>
			</item>';
		}
		$items .= '</channel>
				</rss>';
		return $items;
	}
}
?>